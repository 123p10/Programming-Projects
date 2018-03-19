package Entities;

import java.util.ArrayList;

import Objects.Wall;

public class BasicEnemy extends Enemy{
	public BasicEnemy(int xs,int ys,int ws,int hs, ArrayList<Wall> walls) {
		super(xs, ys, ws, hs, walls);
		speed = 3;
		hp = 100;
		mxhp = hp;
		hitspeed = 10;
	}
}
