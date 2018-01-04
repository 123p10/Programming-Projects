package Objects;

public class Block {
	private int x,y,w,h,str;
	public Block(int x,int y,int w,int h, int str) {
		this.x = x;
		this.y = y;
		this.w = w;
		this.h = h;
		this.str = str;
	}
	public int getX() {
		return x;
	}
	public int getY() {
		return y;
	}
	public int getW() {
		return w;
	}
	public int getH() {
		return h;
	}
	public int getStr() {
		return str;
	}
	public void setStr(int str) {
		this.str = str;
	}
}
