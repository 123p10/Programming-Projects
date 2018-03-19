package Entities;

import java.util.ArrayList;

import Objects.Wall;

public class FastEnemy extends Enemy{
	public FastEnemy(int xs,int ys,int ws,int hs, ArrayList<Wall> walls) {
		super(xs, ys, ws, hs, walls);
		speed = 5;
		hp = 50;
		mxhp = hp;
		hitspeed=  7;
	}

}
