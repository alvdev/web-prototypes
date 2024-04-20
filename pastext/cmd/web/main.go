package main

import (
	"flag"
	"log"
	"net/http"
)

func main() {
	addr := flag.String("addr", ":8080", "Listen HTTP address")
	flag.Parse()

	mux := http.NewServeMux()
	fileServer := http.FileServer(http.Dir("./ui/dist/"))

	mux.Handle("/dist/", http.StripPrefix("/dist/", fileServer))
	mux.HandleFunc("/", home)
	mux.HandleFunc("/text/view", textView)
	mux.HandleFunc("/text/create", textCreate)

	log.Printf("Starting server on %v", *addr)
	err := http.ListenAndServe(*addr, mux)
	log.Fatal(err)
}
