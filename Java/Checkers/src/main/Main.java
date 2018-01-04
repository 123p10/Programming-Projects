package main;

import javax.swing.JFrame;

public class Main {
	public static int DisplayW = 500;
	public static int DisplayH = 500;
	static JFrame mFrame;
	public static void main(String[] args) {
		mFrame = new JFrame();
		Game game = new Game();
		mFrame.setBounds(10, 10, DisplayW, DisplayH);
		mFrame.setTitle("Checkers");
		mFrame.setResizable(false);
		mFrame.setVisible(true);
		mFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		mFrame.add(game);
		tick(game);
	}
	public static void close() {
		mFrame.dispose();
	}
	static void tick(Game game) {
		while(true) {
			game.update();
			game.repaint();
			try {
				Thread.sleep(50);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}

}
