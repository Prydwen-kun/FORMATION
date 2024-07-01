package main

import (
	"log"

	"github.com/hajimehoshi/ebiten/v2"
)

func main() {
	ebiten.SetWindowSize(640, 480)
	ebiten.SetWindowTitle("Hello, World!")

	tileset := newTileset()
	game := newGame(tileset.Map)

	if err := ebiten.RunGame(game); err != nil {
		log.Fatal(err)
	}
}
