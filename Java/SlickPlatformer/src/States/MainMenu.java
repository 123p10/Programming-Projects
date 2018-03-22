package States;

import java.awt.Font;

import org.newdawn.slick.GameContainer;
import org.newdawn.slick.Graphics;
import org.newdawn.slick.Input;
import org.newdawn.slick.SlickException;
import org.newdawn.slick.TrueTypeFont;
import org.newdawn.slick.command.Command;
import org.newdawn.slick.command.InputProvider;
import org.newdawn.slick.command.InputProviderListener;
import org.newdawn.slick.command.KeyControl;
import org.newdawn.slick.state.BasicGameState;
import org.newdawn.slick.state.StateBasedGame;

import Main.Game;

public class MainMenu extends BasicGameState implements InputProviderListener{
	@Override
	public void init(GameContainer container, StateBasedGame arg1) throws SlickException {
	}

	@Override
	public void render(GameContainer arg0, StateBasedGame arg1, Graphics g) throws SlickException {
		// TODO Auto-generated method stub
		g.drawString("Welcome to ", Game.V_WIDTH/2-100, Game.V_HEIGHT/2-100);
		Font font = new Font("Verdana", Font.BOLD, 45);
		TrueTypeFont ttf = new TrueTypeFont(font, true);
		ttf.drawString(Game.V_WIDTH/2-150, Game.V_HEIGHT/2-50, "Nik Parhar");
	}

	@Override
	public void update(GameContainer gc, StateBasedGame sb, int arg2) throws SlickException {
		// TODO Auto-generated method stub
		if(gc.getInput().isKeyDown(gc.getInput().KEY_ENTER)) {
			sb.enterState(Game.TEST);
		}
	}

	@Override
	public int getID() {
		// TODO Auto-generated method stub
		return Game.MAINMENU;
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
