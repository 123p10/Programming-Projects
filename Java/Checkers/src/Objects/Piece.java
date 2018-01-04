package Objects;

public class Piece {
	int color = 0;
	//red = 0
	//black = 1
	Box box;
	boolean isPressed = false;
	public Piece(Box box,int color) {
		this.color = color;
		this.box = box;
		box.piece = this;
	}
	public int getColor() {
		return color;
	}
	public Box getBox() {
		return box;
	}
	public boolean isPressed() {
		return isPressed;
	}
	/*public void press() {
		isPressed = !isPressed;
	}*/
	public void setPress(boolean press) {
		isPressed = press;
	}
	public void setBox(Box b) {
		box.piece = null;
		box = b;
		box.piece = this;
	}
}
