package Objects;

public class Box {
	int x;
	int y;
	public static int size = 50;
	boolean shade = false;
	Piece piece = null;
	
	
	public Box(int x,int y) {
		this.x = x;
		this.y = y;
	}
	public int getX() {
		return x;
	}
	public int getY() {
		return y;
	}
	public boolean getShade() {
		return shade;
	}
	public void setShade(boolean s) {
		shade = s;
	}
	public Piece getPiece() {
		return piece;
	}
	public void setPiece(Piece p) {
		piece = p;
	}
}
