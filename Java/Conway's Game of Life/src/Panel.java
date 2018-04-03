import java.awt.Color;
import java.awt.Graphics;

import javax.swing.JPanel;

public class Panel extends JPanel implements Runnable {
	public static int length = 30;
	public static int width = 30;
	public static Tile[][] tiles;
	public static Tile[][] newtiles;

	Graphics graphic;
	public Panel() {
		tiles = new Tile[length][width];
		for(int x = 0;x < tiles.length;x++) {
			for(int y = 0;y < tiles[x].length;y++) {
				tiles[x][y] = new Tile(x*Tile.w+25,y*Tile.h+50,x,y);
			}
		}
		tiles[6][7].setAlive(true);
		tiles[7][7].setAlive(true);
		tiles[8][7].setAlive(true);
		tiles[8][6].setAlive(true);
		tiles[7][5].setAlive(true);
		newtiles = tiles;

	}
	public void run(Graphics g) {
		// TODO Auto-generated method stub
		draw(g);
		update();

	}
	public void draw(Graphics g) {
		for(int x = 0;x < tiles.length;x++) {
			for(int y = 0;y < tiles[x].length;y++) {
				newtiles[x][y].render(g);
			}
		}

	}
	void update() {
		for(int x = 0;x < tiles.length;x++) {
			for(int y = 0;y < tiles[x].length;y++) {
				newtiles[x][y].update();
			}
		}
		tiles = newtiles;
	}
	@Override
	public void run() {
		// TODO Auto-generated method stub
		
	}

}
