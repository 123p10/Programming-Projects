package com.OwenB.runner;

import com.badlogic.gdx.Gdx;
import com.badlogic.gdx.Screen;
import com.badlogic.gdx.graphics.GL20;
import com.badlogic.gdx.graphics.OrthographicCamera;

public class MainMenuScreen implements Screen {
    OrthographicCamera camera;
    final MainGame game;
    public MainMenuScreen(final MainGame g) {
        game = g;
        camera = new OrthographicCamera();
        float w = Gdx.graphics.getWidth();
        float h = Gdx.graphics.getHeight();
        camera.setToOrtho(false, w, h);
    }

    @Override
    public void show() {

    }

    @Override
    public void render(float delta) {
        Gdx.gl.glClearColor(0, 0, 0.2f, 1);
        Gdx.gl.glClear(GL20.GL_COLOR_BUFFER_BIT);

        camera.update();
        game.batch.setProjectionMatrix(camera.combined);

        game.batch.begin();
        game.font.draw(game.batch, "Welcome to Better than Kush!!! ", camera.viewportWidth/3.75f, camera.viewportHeight/2+35);
        game.font.draw(game.batch, "Tap anywhere to begin!", camera.viewportWidth/3.75f, camera.viewportHeight/2-35);
        game.batch.end();

        if (Gdx.input.isTouched()) {
            game.setScreen(new GameScreen(game));
            dispose();
        }
    }

    @Override
    public void resize(int width, int height) {

    }

    @Override
    public void pause() {

    }

    @Override
    public void resume() {

    }

    @Override
    public void hide() {

    }

    @Override
    public void dispose() {

    }
}
