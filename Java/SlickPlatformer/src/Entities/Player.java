package Entities;

import java.util.ArrayList;

import org.newdawn.slick.GameContainer;
import org.newdawn.slick.geom.Rectangle;
import org.newdawn.slick.geom.Shape;

import Objects.Bullet;
import Objects.Wall;

public class Player extends Entity{
	ArrayList<Bullet> b;
	boolean moving = false;
	int mspeed = 7;
	public Player(int xs, int ys, int ws, int hs,ArrayList<Wall> wall) {
		super(xs, ys, ws, hs, wall);
		shape = new Rectangle(x-(w/2), y-(h/2), w, h);
		b = new ArrayList<Bullet>();
		// TODO Auto-generated constructor stub
	}
	
	public void shoot(GameContainer gc, int type) {
		//type 0 = bullet
		if(type == 0) {
			Bullet b1 = new Bullet(x,y,0,0);
			double sp = b1.getSpeed();

			double angle = Math.atan2(gc.getInput().getMouseX() - x, gc.getInput().getMouseY() - y);
			b1.setvX((sp) * Math.cos(angle));
			b1.setvY((sp) * Math.sin(angle));
			b.add(b1);
			
		}

	}
	
	public ArrayList<Bullet> getBullets() {
		return b;
	}
	
	public void moveLeft() {
		if(velX >= -mspeed) {
			velX -= 0.75;
		}
		moving = true;
	}
	public void moveRight() {
		if(velX <= mspeed) {
			velX += 0.75;
		}
		moving = true;
	}
	public void moveUp() {
		if(velY >= -mspeed) {
			velY -= 0.75;
		}
		moving = true;
	}
	public void moveDown() {
		if(velY <= mspeed) {
			velY += 0.75;
		}
		moving = true;
	}
	
	
}
