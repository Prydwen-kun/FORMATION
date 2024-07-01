package main

import (
	"embed"
	"fmt"
	// "github.com/hajimehoshi/ebiten/v2"
	// "github.com/hajimehoshi/ebiten/v2/ebitenutil"
	// "image/png"
)

type Tileset struct {
	Map[] byte
}

func newTileset()*Tileset{
	var f embed.FS

	data, err := f.ReadFile("zelda-tile.png")
	if(err != nil){
		fmt.Println(err)
	}
	return &Tileset{
		Map: data,
	}
}