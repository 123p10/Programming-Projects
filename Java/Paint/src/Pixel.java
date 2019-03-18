
public class Pixel {
	int r,g,b,a;
	public Pixel(int r,int g,int b,int a) {
		this.r = r;
		this.g = g;
		this.b = b;
		this.a = a;
	}
	public Pixel() {
		this(255,255,255,255);
	}
	
	public void setR(int r) {this.r = r;}
	public void setG(int g) {this.g = g;}
	public void setB(int b) {this.b = b;}
	public void setA(int a) {this.a = a;}
	public void setColor(int r,int g,int b) {
		setR(r);
		setG(g);
		setB(b);
	}
	public int getR() {return r;}
	public int getG() {return g;}
	public int getB() {return b;}
	public int getA() {return a;}
}
