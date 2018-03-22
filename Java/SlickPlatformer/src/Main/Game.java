package Main;

import org.newdawn.slick.AppGameContainer;
import org.newdawn.slick.GameContainer;
import org.newdawn.slick.SlickException;
import org.newdawn.slick.state.StateBasedGame;

import States.MainMenu;
import States.Test;

public class Game extends StateBasedGame{

	public static final int SPLASHSCREEN = 0;
	public static final int MAINMENU = 1;
	public static final int TEST = 2;
	public static final double VERSION = 0.01;
	public static final int V_HEIGHT = 720;
	public static final int V_WIDTH = 1280;
	public static final int FPS = 60;
	public Game(String name) {
		super(name);
	}

	@Override
	public void initStatesList(GameContainer arg0) throws SlickException {
		this.addState(new MainMenu());
		this.addState(new Test());
	}
	public static void main(String[] args) {
        try {
            AppGameContainer app = new AppGameContainer(new Game("Nik Parhar v" + VERSION));
            app.setDisplayMode(V_WIDTH, V_HEIGHT, false);
            app.setTargetFrameRate(FPS);
            app.setShowFPS(true);
            app.start();
        } catch(SlickException e) {
            e.printStackTrace();
        }
	}

}
