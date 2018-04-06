import javax.swing.JFrame;


public class Frame {
	public static int DisplayW = 500;
	public static int DisplayH = 500;
	static JFrame mFrame;
	public Frame() {
		mFrame = new JFrame();
		mFrame.setBounds(10, 10, DisplayW, DisplayH);
		mFrame.setTitle("Truth Table");
		mFrame.setResizable(false);
		mFrame.setVisible(true);
		mFrame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	}
	public static void main(String[] args) {
	//	Frame frame = new Frame();
		
		Main m = new Main();
		
		m.run();

	}
	public static void close() {
		mFrame.dispose();
	}

}
