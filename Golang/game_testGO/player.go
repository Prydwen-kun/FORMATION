package main

import (
	// "image"

	// "github.com/hajimehoshi/ebiten/v2"
	// "github.com/hajimehoshi/ebiten/v2/ebitenutil"
)

type Player struct {
	X, Y          float64
	PlayerModel[]   byte
	Width, Height int
	Health        int
	Inventory     []string
}

func newPlayer(x float64, y float64,tileset []byte) *Player {
	return &Player{
		X: x,
		 Y: y,
		//  PlayerModel: tileset.SubImage(ebiten.Image.Rect(10,10,40,40)),
	}
}

func (player *Player) Update() {
	player.X += 1
	player.Y += 1
}
