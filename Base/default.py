import pgzrun

WIDTH = 500
HEIGHT = 300
FPS = 15
TITLE = "Game"

def draw():
    screen.clear()
    screen.draw.text("Hello World", center=(WIDTH//2,HEIGHT//2), color="white", fontsize=40)

def update(dt):
    pass

pgzrun.go()