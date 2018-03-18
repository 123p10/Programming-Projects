package Entities;

import java.util.ArrayList;

import org.newdawn.slick.GameContainer;
import org.newdawn.slick.geom.Rectangle;
import org.newdawn.slick.geom.Shape;

import Main.Game;
import Objects.Bullet;
import Objects.Wall;

public class Player extends Entity{
	ArrayList<Bullet> b;
	boolean moving = false;
	int mspeed = 7;
	boolean shoot = false;
	public Player(int xs, int ys, int ws, int hs,ArrayList<Wall> wall) {
		super(xs, ys, ws, hs, wall);
		shape = new Rectangle(x-(w/2), y-(h/2), w, h);
		b = new ArrayList<Bullet>();
		hp = 100;
		mxhp = 100;
		// TODO Auto-generated constructor stub
	}
	
	public void shoot(int mx,int my, int type) {
		//type 0 = bullet
		if(type == 0 && !shoot) {
			Bullet b1 = new Bullet(x,y,0,0,walls,b);
			double sp = b1.getSpeed();

			float angle = (float) Math.toDegrees(Math.atan2(my-Game.V_HEIGHT/2+25, mx-Game.V_WIDTH/2+15));
			b1.setvX(sp*Math.cos(Math.toRadians(angle)));
			b1.setvY(sp*Math.sin(Math.toRadians(angle)));
			b.add(b1);	
			shoot = true;
		}

	}
	public ArrayList<Bullet> getBullets() {
		return b;
	}
	
	public void moveLeft() {
		if(velX[9] >= -mspeed) {
			velX[9] -= 0.75;
		}
		moving = true;
	}
	public void moveRight() {
		if(velX[9] <= mspeed) {
			velX[9] += 0.75;
		}
		moving = true;
	}
	public void moveUp() {
		if(velY[9] >= -mspeed) {
			velY[9] -= 0.75;
		}
		moving = true;
	}
	public void moveDown() {
		if(velY[9] <= mspeed) {
			velY[9] += 0.75;
		}
		moving = true;
	}
	public void setShoot(boolean s) {
		shoot = s;
	}
	
	
}
