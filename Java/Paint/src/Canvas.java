import java.awt.Color;
import java.awt.Component;
import java.awt.Graphics;
import java.awt.MouseInfo;

import javax.swing.JFrame;
import javax.swing.SwingUtilities;

public class Canvas extends Component{
	int xPos = 0;
	int yPos = 0;
	int WIDTH,HEIGHT;
	Pixel pixels[][];
	Brush currentBrush;
	int mouseHeld = 1;
	public Canvas(int w,int h) {
		WIDTH = w;
		HEIGHT = h;
		pixels = new Pixel[HEIGHT+1][WIDTH+1];
		for(int y = 0;y < HEIGHT;y++) {
			for(int x = 0;x < WIDTH;x++) {
				pixels[y][x] = new Pixel();
			}
		}
		currentBrush = new Brush();
	}
	
	public void setBrushType(String sprayType) {
		currentBrush.setSprayType(sprayType);
	}
	public void paint(Graphics g) {
		super.paint(g);
		draw(g);
		drawCursor(g);
	}
	public void draw(Graphics g) {
		for(int y = 0;y < HEIGHT;y++) {
			for(int x = 0;x < WIDTH;x++) {
				g.setColor(new Color(pixels[y][x].getR(),pixels[y][x].getG(),pixels[y][x].getB()));
				g.fillRect(x+xPos, y+yPos, 1, 1);
				
			}
		}
	}
	public void drawCursor(Graphics g) {
		JFrame f = (JFrame) SwingUtilities.windowForComponent(this);
		g.setColor(new Color(currentBrush.getR(),currentBrush.getG(),currentBrush.getB()));
		int ytemp = (int) (MouseInfo.getPointerInfo().getLocation().y -  this.getLocationOnScreen().getY());
		int xtemp = (int) (MouseInfo.getPointerInfo().getLocation().x - this.getLocationOnScreen().getX());

		int[] spray = currentBrush.getSpray(xtemp, ytemp);
		for(int i = 0;i < spray.length-1;i+=2) {
			if(spray[i+1]-yPos >= 0 && spray[i+1]-yPos < HEIGHT && spray[i]-xPos >= 0 && spray[i]-xPos < WIDTH) {
				g.fillRect(spray[i], spray[i+1], 1, 1);
			}
		}

	}
	public void click() {
		JFrame f = (JFrame) SwingUtilities.windowForComponent(this);

		int ytemp = (int) (MouseInfo.getPointerInfo().getLocation().y -  this.getLocationOnScreen().getY()-yPos);
		int xtemp = (int) (MouseInfo.getPointerInfo().getLocation().x - this.getLocationOnScreen().getX()-xPos);
		int[] spray = currentBrush.getSpray(xtemp, ytemp);
		for(int i = 0;i < spray.length-1;i+=2) {
			if(spray[i+1] >= 0 && spray[i+1] < HEIGHT && spray[i] >= 0 && spray[i] < WIDTH) {
				pixels[spray[i+1]][spray[i]].setColor(currentBrush.getR(), currentBrush.getG(), currentBrush.getB());
			}
		}
	}
	public int containsM(int x,int y) {
		if(x >= xPos && x <= xPos+WIDTH) {
			if(y >= yPos && y <= yPos+HEIGHT) {
				return 1;
			}
		}
		return 0;
	}
	public Pixel[][] getPixels() {
		return pixels;
	}
	public byte[] getPixelsAsString() {
		byte[] bytes = new byte[WIDTH*HEIGHT*3+3];
		bytes[0] = (byte) (WIDTH/10 % 10);
		bytes[1] = (byte) (WIDTH/100 % 100);
		bytes[2] = (byte) (WIDTH/1000 % 1000);

		//System.out.println(bytes[0] +" " +  bytes[1] + " " + bytes[2]);
		int i = 3;
		for(int y = 0;y < HEIGHT;y++) {
			for(int x = 0;x < WIDTH;x++) {
				bytes[i] = (byte) (pixels[y][x].getR() - 128);
			//	System.out.println(bytes[i]);
				bytes[i+1] = (byte) (pixels[y][x].getG() - 128);
				bytes[i+2] = (byte) (pixels[y][x].getB() - 128);
				i+=3;
			}
		}
		return bytes;
	}
	public void loadPixels(byte[] arr) {
		int wid = arr[0] * 100 + arr[1] * 10 + arr[2] * 1;
		System.out.println(wid);
		WIDTH = wid;
		int y = 0;
		int x = 0;
		for(int i = 3;i < arr.length-1;i+=3) {
			pixels[y][x].setColor(arr[i]+128,arr[i+1]+128,arr[i+2]+128);
			x++;
			if(x == wid) {
				y++;
				x=0;
			}
		}
		//pixels = arr;
	}
	public void setBrushSize(int size) {
		if(currentBrush.getSize() + size >= 0) {
			currentBrush.setSize(size + currentBrush.getSize());
		}
		
	}
	public Brush getCurrentBrush() {
		return currentBrush;
	}
	public void setBrushColor(Color c) {
		currentBrush.setR(c.getRed());
		currentBrush.setG(c.getGreen());
		currentBrush.setB(c.getBlue());

	}
	public int getXPos() {return xPos;}
	public int getYPos() {return yPos;}
	public int getW() {return WIDTH;}
	public int getH() {return HEIGHT;}
	public void setXPos(int x) {xPos = x;}
	public void setYPos(int y) {yPos = y;}
	public void setPos(int x,int y) {xPos = x;yPos = y;}
	
}
