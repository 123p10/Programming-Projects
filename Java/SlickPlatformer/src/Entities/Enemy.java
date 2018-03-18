package Entities;

import java.util.ArrayList;

import org.newdawn.slick.geom.Rectangle;

import Main.Game;
import Objects.Wall;

public class Enemy extends Entity{
	double speed;
	Player player;
	int damage = 10;
	public Enemy(int xs,int ys,int ws,int hs, ArrayList<Wall> walls) {
		super(xs, ys, ws, hs, walls);
		shape = new Rectangle(x-(w/2), y-(h/2), w, h);
	}
	public void chase(int cx,int cy) {
		float angle = (float) Math.toDegrees(Math.atan2(cy-y,cx-x));
		setvX((int) (speed*Math.cos(Math.toRadians(angle))));
		setvY((int) (speed*Math.sin(Math.toRadians(angle))));
	}
	public int getDamage() {
		return damage;
	}
}
