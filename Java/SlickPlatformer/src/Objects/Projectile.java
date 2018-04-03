package Objects;

import java.util.ArrayList;

import org.newdawn.slick.geom.Shape;

public class Projectile {
	int x,y,w,h;
	double velX = 0;
	double velY = 0;
	Shape shape;
	double speed;
	ArrayList<Wall> walls;
	ArrayList<Bullet> bulls;
	int damage;
	
	public Projectile(int xs, int ys,double vX,double vY) {
		x = xs;
		y = ys;
		velX = vX;
		velY = vY;
	}
	public Projectile(int xs, int ys,double vX,double vY,ArrayList<Wall> w) {
		x = xs;
		y = ys;
		velX = vX;
		velY = vY;
		walls = w;
	}
	public Projectile(int xs, int ys,double vX,double vY,ArrayList<Wall> w,ArrayList<Bullet> b) {
		x = xs;
		y = ys;
		velX = vX;
		velY = vY;
		walls = w;
		bulls = b;
	}

	public void update() {
		x += velX;
		y += velY;
		checkColl();
	}
	void checkColl() {
		if(walls != null) {
			for(Wall coll : walls) {
				if(shape.intersects(coll.getShape())) {
					bulls.remove(this);
				}
			}
		}
	}
	
	public void setvX(double d) {
		velX = d;
	}
	public void setvY(double ys) {
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
	public int getDamage() {
		return damage;
	}
	public double getvX() {
		return velX;
	}
	public double getvY() {
		return velY;
	}

}
