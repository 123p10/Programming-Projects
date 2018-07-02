// Copyright 2010 The Go Authors. All rights reserved.
// Use of this source code is governed by a BSD-style
// license that can be found in the LICENSE file.

package main

import (
	"html/template"
	"io/ioutil"
	"log"
	"net/http"
	"regexp"
  "time"
  "os"
)

type Page struct {
	Title string
	Body  []byte
}

const pathToView = "/articles/";

const pathToSave = "/save/";

const pathToEdit = "/edit/";

func (p *Page) save() error {
  timestamp := time.Now().Local()
  date := timestamp.Format("2006-01-02")
  os.MkdirAll(date,0600)
	filename := date + "/" + p.Title + ".txt"
	return ioutil.WriteFile(filename, p.Body, 0600)
}

func loadPage(title string, folder string) (*Page, error) {
	filename := folder+"/"+title + ".txt"
	body, err := ioutil.ReadFile(filename)
	if err != nil {
		return nil, err
	}
	return &Page{Title: title,Body: body}, nil
}

func viewHandler(w http.ResponseWriter, r *http.Request, folder string,title string) {
	p, err := loadPage(title,folder)
	if err != nil {
		http.Redirect(w, r, pathToEdit+folder+"/"+title, http.StatusFound)
		return
	}
	renderTemplate(w, "articles", p)
}

func editHandler(w http.ResponseWriter, r *http.Request, folder string, title string) {
	p, err := loadPage(title,folder)
	if err != nil {
		p = &Page{Title: title}
	}
	renderTemplate(w, "edit", p)
}

func saveHandler(w http.ResponseWriter, r *http.Request,folder string, title string) {
	body := r.FormValue("body")
	p := &Page{Title: title, Body: []byte(body)}
	err := p.save()
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
		return
	}
	http.Redirect(w, r, pathToView+folder+"/"+title, http.StatusFound)
}

var templates = template.Must(template.ParseFiles("templates/edit.html", "templates/articles.html"))

func renderTemplate(w http.ResponseWriter, tmpl string, p *Page) {
	err := templates.ExecuteTemplate(w, tmpl+".html", p)
	if err != nil {
		http.Error(w, err.Error(), http.StatusInternalServerError)
	}
}

var validPath = regexp.MustCompile("/(edit|save|articles)/(.+)$")

func makeHandler(fn func(http.ResponseWriter, *http.Request, string,string)) http.HandlerFunc {
	return func(w http.ResponseWriter, r *http.Request) {
		m := validPath.FindStringSubmatch(r.URL.Path)
		if m == nil {
			http.NotFound(w, r)
			return
		}
      fn(w, r, m[2],m[3])
	}
}

func main() {
	http.HandleFunc(pathToView, makeHandler(viewHandler))
	http.HandleFunc(pathToEdit, makeHandler(editHandler))
	http.HandleFunc(pathToSave, makeHandler(saveHandler))

	log.Fatal(http.ListenAndServe(":8080", nil))
}
