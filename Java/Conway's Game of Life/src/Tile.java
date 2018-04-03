import java.awt.Color;
import java.awt.Graphics;

public class Tile {
	int x;
	int y;
	public static int w = 10;
	public static int h = 10;
	boolean alive = false;
	int xpos,ypos;
	public Tile(int xs,int ys,int xp,int yp) {
		x = xs;
		y = ys;
		xpos = xp;
		ypos = yp;
	}
	
	public int getX() {
		return x;
	}
	public int getY() {
		return y;
	}
	public void setAlive(boolean a) {
		alive = a;
	}
	public boolean getAlive() {
		return alive;
	}
	public void render(Graphics g) {
		if(alive) {
			g.setColor(Color.black);
			g.fillRect(x, y, w, h);
		}
		else {
			g.setColor(Color.white);
			g.fillRect(x, y, w, h);
		//	g.setColor(Color.black);
			//g.drawRect(x, y, w, h);

		}
	}
	public void update() {
		int num = numberofNeighbours();
		if(!alive && num == 3) {
			alive = true;
		}
		else if(alive && num < 2) {
			alive = false;
		}
		else if(alive && (num == 3 || num == 2)) {
			alive = true;
		}
		else if(alive && num > 3) {
			alive = false;
		}
	}
	int numberofNeighbours() {
		int n = 0;
		int xc = xpos;
		int yc = ypos;
		n += checkN(xc,yc-1);
		n += checkN(xc+1,yc-1);
		n += checkN(xc+1,yc);
		n += checkN(xc+1,yc+1);
		n += checkN(xc,yc+1);
		n += checkN(xc-1,yc+1);
		n += checkN(xc-1,yc);
		n += checkN(xc-1,yc-1);


		return n;
	}
	int checkN(int xd,int yd) {
		if(xd < Panel.length && xd >= 0 && yd < Panel.width && yd >=0) {
			if(Panel.tiles[xd][yd].getAlive()) {
				return 1;
			}
		}
		return 0;
	}
}
