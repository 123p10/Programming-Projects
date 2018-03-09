package Objects;

import java.util.ArrayList;

import org.newdawn.slick.geom.Shape;

public class Projectile {
	int x,y,w,h;
	double velX = 0;
	double velY = 0;
	Shape shape;
	double speed;
	public Projectile(int xs, int ys,double vX,double vY) {
		x = xs;
		y = ys;
		velX = vX;
		velY = vY;
	}
	public void update() {
		x += velX;
		y += velY;
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

}
