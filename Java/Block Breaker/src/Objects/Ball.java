package Objects;

public class Ball {
	private double x,y,w,h,vx,vy;
	
	public Ball(double x,double y,double w, double h,double vx,double vy) {
		this.x = x;
		this.y = y;
		this.w = w;
		this.h = h;
		this.vx = vx;
		this.vy = vy;
	}
	public double getX() {
		return x;
	}
	public double getY() {
		return y;
	}
	public double getW() {
		return w;
	}
	public double getH() {
		return h;
	}
	public double getVX() {
		return vx;
	}
	public double getVY() {
		return vy;
	}
	public void setX(double x) {
		this.x = x;
	}
	public void setY(double y) {
		this.y = y;
	}
	public void setVX(double vx) {
		this.vx = vx;
	}
	public void setVY(double vy) {
		this.vy = vy;
	}
	public void deflectX() {
		vx *= -1;
	}
	public void deflectY() {
		vy *= -1;
	}
}
