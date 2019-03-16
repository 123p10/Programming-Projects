
public class Main {
 
	public static void main(String[] args) {
		
		// TODO Auto-generated method stub
		//One Test
		Board myBoard = new Board();
		Frame myFrame = new Frame();
		myFrame.addBoard(myBoard);
		myBoard.setBoardStyle(0);
		while(myBoard.isSolved() == 0) {
			myBoard.scanBoard();
			myFrame.repaint();

		}
		if(myBoard.checkSolution()==1) {
			System.out.println("Properly Solved");
		}
		else {
			System.out.println("Improperly Solved");
		}
		
		
		//Loop Tests
		/*for(int i = 2;i <= 4;i++) {
			myBoard = new Board();
			myFrame = new Frame();
			myFrame.addBoard(myBoard);
			myBoard.setBoardStyle(i);
			while(myBoard.isSolved() == 0) {
				myBoard.scanBoard();
				myFrame.repaint();
	
			}
			if(myBoard.checkSolution()==1) {
				System.out.println("Properly Solved");
			}
			else {
				System.out.println("Improperly Solved");
			}
	
		}*/
	}
}
