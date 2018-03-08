package Objects;

import org.newdawn.slick.geom.Rectangle;
import org.newdawn.slick.geom.Shape;

public class Wall {
	Shape shape;
	//0 = top
	//90 = right
	//180 = bottom
	//270 = left
	int side;
	public Wall(int x, int y,int w, int h,int s) {
		shape = new Rectangle(x, y, w, h);
		side = s;
	}
	public Shape getShape() {
		return shape;
	}
	public int getSide() {
		return side;
	}
}
