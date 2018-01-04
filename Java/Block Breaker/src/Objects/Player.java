package Objects;

import Main.Game;

public class Player {

	private int x,y,w,h;
	public Player(int x,int y,int w,int h) {
		this.x = x;
		this.y = y;
		this.w = w;
		this.h = h;
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
	public void setX(int x) {
		this.x = x;
	}
	public void setY(int y) {
		this.y = y;
	}
	public void throwBall(int mx,int my) {
		float angle = (float)Math.atan2 ( my - y, mx - x );
		float scaleX = (float)Math.cos(angle);
		float scaleY = (float)Math.sin(angle);
		float velX = (scaleX * -4);
		float velY = (scaleY * -4);
		Ball ball1 = new Ball(x + w/2 - Game.ballSize/2,y,Game.ballSize,Game.ballSize,velX,velY);
		Game.balls.add(ball1);

	}
	public void move(int x) {
		this.x += x;
	}
}
