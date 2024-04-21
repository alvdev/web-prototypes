package main

import (
	"flag"
	"log"
	"net/http"
	"os"
)

func main() {
	logInfo := log.New(os.Stdout, "INFO:\t", log.Ldate|log.Ltime)
	logErr := log.New(os.Stderr, "ERROR:\t", log.Ldate|log.Ltime|log.Lshortfile)

	addr := flag.String("addr", ":8080", "Listen HTTP address")
	flag.Parse()

	mux := http.NewServeMux()
	fileServer := http.FileServer(http.Dir("./ui/dist/"))

	mux.Handle("/dist/", http.StripPrefix("/dist/", fileServer))
	mux.HandleFunc("/", home)
	mux.HandleFunc("/text/view", textView)
	mux.HandleFunc("/text/create", textCreate)

	logInfo.Printf("Starting server on %v", *addr)
	err := http.ListenAndServe(*addr, mux)
	logErr.Fatal(err)
}
