
public class Main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Board myBoard = new Board();
		Frame myFrame = new Frame();
		myFrame.addBoard(myBoard);
		myBoard.setBoardStyle(3);
		while(myBoard.isSolved() == 0) {
	//		System.out.print("Loop");
			myBoard.scanBoard();
			myFrame.repaint();

		}
	}

}
