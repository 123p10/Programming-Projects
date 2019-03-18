
public class Main {
	//Controls
	//Left Click to draw
	//C to change color
	//Click buttons on button to change brush shape
	//click + to increase brush size
	//click - to decrease brush size
	
	
	//TODO
	//SAVE AND LOAD FILES
	public static void main(String[] args) {
		Canvas myCanvas = new Canvas(550,550);
		myCanvas.setPos(50, 70);
		
		Frame myFrame = new Frame(700,800,myCanvas);
		MyMouseListener mouseListener = new MyMouseListener(myFrame);
		KeyListener keyListener = new KeyListener(myFrame);
		myFrame.addMouseListener(mouseListener);
		myFrame.addMyKeyListener(keyListener);
		myFrame.add(myCanvas);
		myFrame.finishWindow();
		while(true) {
			myFrame.validate();
			myFrame.repaint();
			try {
				Thread.sleep(50);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
