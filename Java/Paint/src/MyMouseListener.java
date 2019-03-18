import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

public class MyMouseListener extends MouseAdapter{
	Frame f;
	public MyMouseListener(Frame f) {
		this.f = f;
	}
	public void mousePressed(MouseEvent e) {
		f.click(e);
	}
	public void mouseReleased(MouseEvent e) {
		f.unclick();
	}

}
