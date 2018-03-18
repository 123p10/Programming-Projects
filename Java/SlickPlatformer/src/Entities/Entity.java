package Entities;

import java.util.ArrayList;

import org.newdawn.slick.geom.Rectangle;
import org.newdawn.slick.geom.Shape;

import Objects.Wall;

import Objects.Wall;

public class Entity {
	int x,y,w,h;
	//double velX = 0;
	//double velY = 0;
	double[] velX = new double[50];
	double[] velY = new double[50];
	Shape shape;
	ArrayList<Wall> walls;
	double mxhp;
	double hp;
	Rectangle gBar;
	Rectangle rBar;
	
	public Entity(int xs, int ys, int ws, int hs,ArrayList<Wall> wall) {
		x = xs;
		y = ys;
		w = ws;
		h = hs;
		walls = wall;
		gBar = new Rectangle(x-(w/2),y+(h/2)+3,w,1);
		rBar = new Rectangle(x-(w/2),y+(h/2)+3,w,1);
	}
	
	public void update() {
		checkCollision();
		x += velX[velX.length-1];
		y += velY[velX.length-1];
		velX = shiftArray(velX);
		velY = shiftArray(velY);
		gBar.setX(x-(w/2));
		gBar.setY(y+(h/2)+3);
		rBar.setX(x-(w/2));
		rBar.setY(y+(h/2)+3);
		gBar.setWidth((float) ((hp/mxhp)*w));
	}
	public void setvX(int xs) {
		velX[0] = xs;
	}
	public void setvY(int ys) {
		velY[0] = ys;
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
					if(velX[velX.length-1] < 0) {
						velX[velX.length-1] = 0;
					}
				}
				else if(wall.getSide() == 90) {
					if(velX[velX.length-1] > 0) {
						velX[velX.length-1] = 0;
					}
				}
				else if(wall.getSide() == 180) {
					if(velY[velY.length-1] > 0) {
						velY[velY.length-1] = 0;
					}
				}
				else if(wall.getSide() == 0) {
					if(velY[velY.length-1] < 0) {
						velY[velY.length-1] = 0;
					}
				}


			}
		}
	}
	public Shape getGBar() {
		return gBar;
	}
	public Shape getRBar() {
		return rBar;
	}
	public void damage(int hps) {
		hp -= hps;
	}
	public double getHP() {
		return hp;
	}
	public double[] shiftArray(double[] a) {
		double[] temp = a;
		for(int i = 0;i < a.length-1;i++) {
			temp[i+1] = a[i];
		}
		return temp;
		//return null;
	}

}
