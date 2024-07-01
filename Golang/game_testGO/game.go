package main

import (
	"github.com/hajimehoshi/ebiten/v2"
	"github.com/hajimehoshi/ebiten/v2/ebitenutil"

	"strconv"
)

type Game struct {
	Player Player
}

func newGame(tileset []byte) *Game {
	return &Game{Player: *newPlayer(0, 0,tileset)}
}

func (g *Game) Update() error {
	g.Player.Update()
	return nil
}

func (g *Game) Draw(screen *ebiten.Image) {
	ebitenutil.DebugPrint(screen, "Hello, World!")
	ebitenutil.DebugPrint(screen, strconv.FormatFloat(g.Player.X, 'b', 2, 64))
}

func (g *Game) Layout(outsideWidth, outsideHeight int) (screenWidth, screenHeight int) {
	return 320, 240
}
