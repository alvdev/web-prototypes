package main

import (
	"log"
	"net/http"
)

func home(w http.ResponseWriter, r *http.Request) {
	if r.URL.Path != "/" {
		// Default 404 error
		// http.NotFound(w, r)
		w.Write([]byte("<h1>Error 404: Page not found</h1>"))
		return
	}
	w.Write([]byte("<h1>Hello from Pastext</h1>"))
}

func textView(w http.ResponseWriter, r *http.Request) {
	w.Write([]byte("<h1>View text page</h1>"))
}

func textCreate(w http.ResponseWriter, r *http.Request) {
	w.Write([]byte("<h1>Create text page</h1>"))
}

func main() {
	mux := http.NewServeMux()
	mux.HandleFunc("/", home)
	mux.HandleFunc("/text/view", textView)
	mux.HandleFunc("/text/create", textCreate)

	log.Print("Starting server on :8080")
	err := http.ListenAndServe(":8080", mux)
	log.Fatal(err)
}
