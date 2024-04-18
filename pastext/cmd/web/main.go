package main

import (
	"log"
	"net/http"
)

func main() {
	mux := http.NewServeMux()
	fileServer := http.FileServer(http.Dir("./ui/dist/"))
	mux.Handle("/dist/", http.StripPrefix("/dist/", fileServer))
	mux.HandleFunc("/", home)
	mux.HandleFunc("/text/view", textView)
	mux.HandleFunc("/text/create", textCreate)

	log.Print("Starting server on :8080")
	err := http.ListenAndServe(":8080", mux)
	log.Fatal(err)
}
