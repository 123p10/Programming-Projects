package Entities;

import java.util.ArrayList;

import org.newdawn.slick.geom.Shape;

import Objects.Wall;

import Objects.Wall;

public class Entity {
	int x,y,w,h;
	double velX = 0;
	double velY = 0;
	Shape shape;
	ArrayList<Wall> walls;
	public Entity(int xs, int ys, int ws, int hs,ArrayList<Wall> wall) {
		x = xs;
		y = ys;
		w = ws;
		h = hs;
		walls = wall;
	}
	
	public void update() {
		checkCollision();

		x += velX;
		y += velY;
	}
	public void setvX(int xs) {
		velX = xs;
	}
	public void setvY(int ys) {
		velY = ys;
	}
	public Shape getShape() {
		shape.setCenterX(x);
		shape.setCenterY(y);
		
		return shape;
	}	
	public void setX(int xs) {
		x = xs;
	}
	public void setY(int ys) {
		y = ys;
	}
	public int getX() {
		return x;
	}
	public int getY() {
		return y;
	}
	public int getW() {
		return w;
	}
	public int getH() {
		return h;
	}
	public void checkCollision() {
		for(Wall wall : walls) {
			if(shape.intersects(wall.getShape())) {
				if(wall.getSide() == 270) {
					if(velX < 0) {
						velX = 0;
					}
				}
				else if(wall.getSide() == 90) {
					if(velX > 0) {
						velX = 0;
					}
				}
				else if(wall.getSide() == 180) {
					if(velY > 0) {
						velY = 0;
					}
				}
				else if(wall.getSide() == 0) {
					if(velY < 0) {
						velY = 0;
					}
				}


			}
		}
	}

}
