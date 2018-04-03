package Entities;

import java.util.ArrayList;

import org.newdawn.slick.geom.Rectangle;

import Main.Game;
import Objects.Bullet;
import Objects.Gun;
import Objects.Pistol;
import Objects.Wall;

public class Player extends Entity{
	ArrayList<Bullet> b;
	boolean moving = false;
	int mspeed = 7;
	boolean shoot = false;
	int weaponType = 0;
	//weapon 0 = pistol
	//weapon 1 = shotgun
	
	Gun[] guns = new Gun[2]; 
	
	
	
	

	
	public Player(int xs, int ys, int ws, int hs,ArrayList<Wall> wall) {
		super(xs, ys, ws, hs, wall);
		shape = new Rectangle(x-(w/2), y-(h/2), w, h);
		b = new ArrayList<Bullet>();
		hp = 100;
		mxhp = 100;
		hitspeed = 20;
		guns[0] = new Pistol();
		// TODO Auto-generated constructor stub
	}
	
	public void shoot(int mx,int my) {
		//type 0 = bullet
		if(weaponType == 0 && !shoot) {
			if(guns[weaponType].getCurrClip() > 0) {
				Bullet b1 = new Bullet(x,y,0,0,walls,b);
				double sp = b1.getSpeed();
		
				float angle = (float) Math.toDegrees(Math.atan2(my-Game.V_HEIGHT/2+25, mx-Game.V_WIDTH/2+15));
				b1.setvX(sp*Math.cos(Math.toRadians(angle)));
				b1.setvY(sp*Math.sin(Math.toRadians(angle)));
				b.add(b1);	
				shoot = true;
				guns[weaponType].setCurrClip(guns[weaponType].getCurrClip() - 1);
			}
			else {
				guns[weaponType].reload();
				shoot = true;
			}
		}
		if(weaponType == 1 && !shoot) {
			Bullet b1 = new Bullet(x,y,0,0,walls,b);
			Bullet b2 = new Bullet(x,y,0,0,walls,b);
			Bullet b3 = new Bullet(x,y,0,0,walls,b);

			double sp = b1.getSpeed();

			float angle = (float) Math.toDegrees(Math.atan2(my-Game.V_HEIGHT/2+25, mx-Game.V_WIDTH/2+15));
			b1.setvX(sp*Math.cos(Math.toRadians(angle)));
			b1.setvY(sp*Math.sin(Math.toRadians(angle)));
			b2.setvX(sp*Math.cos(Math.toRadians(angle+10)));
			b2.setvY(sp*Math.sin(Math.toRadians(angle+10)));
			b3.setvX(sp*Math.cos(Math.toRadians(angle-10)));
			b3.setvY(sp*Math.sin(Math.toRadians(angle-10)));
			b.add(b1);	
			b.add(b2);
			b.add(b3);
			shoot = true;
//			guns[weaponType].setCurrClip(guns[weaponType].getCurrClip() - 1);

		}


	}
	
	public void setWeapon(int we) {
		weaponType = we;
		
	}
	
	public ArrayList<Bullet> getBullets() {
		return b;
	}
	
	public void moveLeft() {
		if(velX[velX.length-1] >= -mspeed) {
			velX[0] -= 0.75;
		}
		moving = true;
	}
	public void moveRight() {
		if(velX[velX.length-1] <= mspeed) {
			velX[0] += 0.75;
		}
		moving = true;
	}
	public void moveUp() {
		if(velY[velY.length-1] >= -mspeed) {
			velY[0] -= 0.75;
		}
		moving = true;
	}
	public void moveDown() {
		if(velY[velY.length-1] <= mspeed) {
			velY[0] += 0.75;
		}
		moving = true;
	}
	public void setShoot(boolean s) {
		shoot = s;
	}
	public void hit(Enemy e) {
		super.hit(e);
		hp -= e.getDamage();
		if(hp <= 0) {
			die();
		}
	}
	public void die() {
		System.out.println("dead");
	}
	public Gun getWeapon() {
		return guns[weaponType];
	}
	
	
}
