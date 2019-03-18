import java.util.ArrayList;

public class Brush {
	int size = 10;
	int r,g,b;
	String sprayType = "Pen";
	//getShape()
	public Brush() {
		r = 0;
		g = 0;
		b = 0;
	}
	public int[] getSpray(int x,int y) {
		if(sprayType.equals("Pencil")) {
			return squareSpray(x,y);
		}
		if(sprayType.equals("Pen")) {
			return circleSpray(x,y);
		}
		return new int[0];
	}
	public int[] circleSpray(int x,int y) {
		int[] values = new int[(int) (size*size*2*3.14159)];
		int increm = 0;
		for(int y2 = -size/2;y2 < size/2;y2++) {
			for(int x2 = -size/2;x2 < size/2;x2++) {
				if(Math.sqrt(Math.pow(y2, 2) + Math.pow(x2, 2)) <= size/2) {
					values[increm] = x2 + x;
					values[increm+1] = y2 + y;
					increm+=2;
				}
			}
		}
		
		return values;
		
	}

	public int[] squareSpray(int x,int y) {
		int increm = 0;
		int[] values = new int[size*size*2];
		for(int i = 0;i < size;i++) {
			for(int j = 0;j < size;j++) {
				values[increm] = x+i-size/2;
				values[increm+1] = y+j-size/2;
				increm+=2;
			}
		}
		return values;

	}
	public void setSprayType(String spray) {
		sprayType = spray;
	}
	public String getSprayType() {
		return sprayType;
	}

	public int getR() {return r;}
	public int getG() {return g;}
	public int getB() {return b;}
	public void setR(int r) {this.r = r;}
	public void setG(int g) {this.g = g;}
	public void setB(int b) {this.b = b;}
	public void setSize(int size) {this.size = size;}
	public int getSize() {return this.size;}
}
