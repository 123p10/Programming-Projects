import java.awt.Dimension;
import java.awt.Graphics;

import javax.swing.JFrame;

public class Frame extends JFrame{
	int WID = 630;
	int HEI = 670;
	Board board;
	public Frame() {
        this.setPreferredSize(new Dimension(WID, HEI));
        this.pack();
        this.setVisible(true);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);

	}
	public void addBoard(Board b) {
		board = b;
	}
	@Override
	public void paint(Graphics g) {
		board.draw(g);
	}
}
