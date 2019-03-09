import java.awt.Dimension;
import java.awt.Graphics;

import javax.swing.JFrame;
public class Frame extends JFrame {
	int WID = 800;
	int HEI = 800;
	int scalefactor = 10;
    public Frame() {
        this.setPreferredSize(new Dimension(WID, HEI));
        this.pack();
        this.setVisible(true);
        this.setDefaultCloseOperation(EXIT_ON_CLOSE);
    }
    @Override
    public void paint(Graphics g) {
        super.paint(g);

        // define the position
        int locX = 200;
        int locY = 200;
        g.drawLine(WID/2, 0, WID/2, HEI);
        g.drawLine(0, HEI/2, WID, HEI/2);
        // draw a line (there is no drawPoint..)
       // g.drawLine(locX, locY, locX, locY);
        int x = -WID/2/scalefactor;
        for(int i = 0;i < WID;i+=scalefactor) {
        	g.drawLine(i, -calculateY(x)+HEI/2, i+scalefactor, -calculateY(x+1)+HEI/2);
        	//x++;
        	if(i % scalefactor == 0) {
        		x++;
        	}
        	if(x % 5 == 0) {
        		g.drawLine(i,HEI/2,i,HEI/2+5);
        	}
        	//g.drawLine(i+WID/2, -calculateY(i)+HEI/2, i+WID/2+2, -calculateY(i+1)+HEI/2);
        }
    }
    public int calculateY(int x) {
    //	if(x == 0) {return 1;}
    	return (2*x*x*x+3*x*x+2*x-10);
    }

}
