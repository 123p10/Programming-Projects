package Main;

import org.newdawn.slick.GameContainer;
import org.newdawn.slick.Graphics;
import org.newdawn.slick.Input;
import org.newdawn.slick.SlickException;
import org.newdawn.slick.command.Command;
import org.newdawn.slick.command.InputProvider;
import org.newdawn.slick.command.InputProviderListener;
import org.newdawn.slick.command.KeyControl;
import org.newdawn.slick.state.BasicGameState;
import org.newdawn.slick.state.StateBasedGame;

public class MainMenu extends BasicGameState implements InputProviderListener{
	public static final int ID = 0;
	@Override
	public void init(GameContainer container, StateBasedGame arg1) throws SlickException {
		// TODO Auto-generated method stub
	}

	@Override
	public void render(GameContainer arg0, StateBasedGame arg1, Graphics g) throws SlickException {
		// TODO Auto-generated method stub
		g.drawString("Welcome to ", Game.V_WIDTH/2-100, Game.V_HEIGHT/2-100);
	}

	@Override
	public void update(GameContainer gc, StateBasedGame arg1, int arg2) throws SlickException {
		// TODO Auto-generated method stub
		if(gc.getInput().isKeyDown(gc.getInput().KEY_ENTER)) {
			System.out.print("h");
		}
	}

	@Override
	public int getID() {
		// TODO Auto-generated method stub
		return ID;
	}

	@Override
	public void controlPressed(Command arg0) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void controlReleased(Command arg0) {
		// TODO Auto-generated method stub
		
	}

}
