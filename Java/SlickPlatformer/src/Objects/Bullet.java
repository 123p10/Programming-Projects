package Objects;

import java.util.ArrayList;

import org.newdawn.slick.geom.Rectangle;

public class Bullet extends Projectile{
	public Bullet(int xs, int ys, double vX, double vY,ArrayList<Wall> wa,ArrayList<Bullet> b) {
		super(xs, ys, vX, vY);
		w = 10;
		h = 10;
		shape = new Rectangle(x-(w/2), y-(h/2), w, h);
		shape.setCenterX(x);
		shape.setCenterY(y);
		speed = 20;
		walls = wa;
		bulls = b;
		damage = 10;
	}
	public double getSpeed() {
		return speed;
	}
	
	
}
