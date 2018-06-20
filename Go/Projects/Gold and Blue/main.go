// Copyright 2010 The Go Authors. All rights reserved.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

package main

import (
  "html/template"
	"io/ioutil"
	"log"
	"net/http"
  "time"
)
type Page struct {
	Title string
	Body  []byte
}

const pathToArticles = "/articles/"
const pathToEdit = "/edit/"
const pathToSave = "/save/"

func (p *Page) save() error {
  currTime := time.Now().Local()
  timestamp := currTime.Format("2006-01-02")
	filename := timestamp + "/" + p.Title + ".txt"
	return ioutil.WriteFile(filename, p.Body, 0600)
}

func loadPage(title string) (*Page, error) {
	filename := title + ".txt"
	body, err := ioutil.ReadFile(filename)
	if err != nil {
		return nil, err
	}
	return &Page{Title: title, Body: body}, nil
}

func viewHandler(w http.ResponseWriter, r *http.Request) {
	title := r.URL.Path[len(pathToArticles):]
	p, err := loadPage(title)
  if err != nil{
    http.Redirect(w,r,pathToEdit+title,http.StatusFound)
    return
  }
  renderTemplate(w, "templates/view",p)
}

func editHandler(w http.ResponseWriter, r *http.Request) {
    title := r.URL.Path[len(pathToEdit):]
    p, err := loadPage(title)
    if err != nil {
        p = &Page{Title: title}
    }
    renderTemplate(w, "templates/edit",p)
}

func saveHandler(w http.ResponseWriter, r *http.Request) {
    title := r.URL.Path[len(pathToSave):]
    body := r.FormValue("body")
    p := &Page{Title: title, Body: []byte(body)}
    p.save()
    http.Redirect(w, r, pathToArticles+title, http.StatusFound)
}

func renderTemplate(w http.ResponseWriter, tmpl string, p *Page) {
    t, _ := template.ParseFiles(tmpl + ".html")
    t.Execute(w, p)
}

func main() {
	http.HandleFunc(pathToArticles, viewHandler)
  http.HandleFunc(pathToEdit, editHandler)
  http.HandleFunc("/save/", saveHandler)
	log.Fatal(http.ListenAndServe(":8080", nil))
}
