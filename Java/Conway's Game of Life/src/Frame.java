import javax.swing.JFrame;


public class Frame {
	public static int DisplayW = 500;
	public static int DisplayH = 500;
	static JFrame mFrame;
	public Frame() {
		mFrame = new JFrame();
		mFrame.setBounds(10, 10, DisplayW, DisplayH);
		mFrame.setTitle("Conway's Game of Life");
		mFrame.setResizable(false);
		mFrame.setVisible(true);
		mFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		Panel panel = new Panel();
		mFrame.add(panel);
		while(true) {
			panel.run(mFrame.getGraphics());
			try {
				Thread.sleep(500);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
	}
	public static void main(String[] args) {
		Frame frame = new Frame();
	}
	public static void close() {
		mFrame.dispose();
	}

}
