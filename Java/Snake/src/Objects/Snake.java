package Objects;

import java.util.ArrayList;

public class Snake {
	int size = 10;
	int length = 900;
	int x,y;
	int dir;
	public int lives = 1;
	//Higher speed is slower
//	int movSpeed
	int speed = 2;
	int currspeed = 0;
	//0 = up
	//90 = right
	//180 = down
	//270 = left
    public ArrayList<Integer> xPos = new ArrayList();
    public ArrayList<Integer> yPos = new ArrayList();

    public Snake(int x,int y,int dir) {
    	this.x = x;
    	this.y = y;
    	this.dir = dir;
    }
    public void update() {
	//	currspeed++;
		//if(currspeed >= speed) {
			//currspeed = 0;
			if(dir == 0) {
				y -= speed;
			}
			if(dir == 90) {
				x += speed;
			}
			if(dir == 180) {
				y += speed;
			}
			if(dir == 270) {
				x -= speed;
			}
			xPos.add(x);
			yPos.add(y);
			if(xPos.size() > length){
				xPos.remove(0);
				yPos.remove(0);
			}
			for(int i = 0;i < xPos.size();i++) {
				if(i != xPos.size() - 2 && i != xPos.size() - 1 && i != xPos.size() - 3 && i != xPos.size() - 4 && i != xPos.size() - 5 && i != xPos.size() - 6 && i != xPos.size() - 7 && i != xPos.size() - 8 && i != xPos.size() - 9) {
					if(xPos.get(xPos.size()-1) + size > xPos.get(i) && xPos.get(xPos.size()-1) < xPos.get(i) + size && yPos.get(yPos.size()-1) + size > yPos.get(i) && yPos.get(yPos.size()-1) < yPos.get(i) + size) {
						lives--;
						System.out.println(i);
					}
				}

			}


    }
    public void setDir(int dir) {
    	this.dir = dir;
    }
    public int getSize() {
    	return size;
    }
    public int getLength() {
    	return length;
    }
    public void setLength(int l) {
    	this.length = l;
    }
}
