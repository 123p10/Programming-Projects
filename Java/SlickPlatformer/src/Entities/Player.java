package Entities;

import java.util.ArrayList;

import org.newdawn.slick.geom.Rectangle;
import org.newdawn.slick.geom.Shape;

import Objects.Wall;

public class Player extends Entity{

	boolean moving = false;
	int mspeed = 7;
	public Player(int xs, int ys, int ws, int hs,ArrayList<Wall> wall) {
		super(xs, ys, ws, hs, wall);
		shape = new Rectangle(x-(w/2), y-(h/2), w, h);
		// TODO Auto-generated constructor stub
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
