# Untitled restful framework

A framework for PHP intended for building RESTful APIs and that's literally it. No heavyweight templating engine,
no bloat or cruft that can't be removed due to tight vertical integration, just a lightweight, dependency minimal
(was originally going to be dependency free but there's a fine line between being idealism and unrealism) framework
that's straightforward to use.

## Project goals

- Heavily config driven, simple to make sweeping changes by altering configuration.
- `application/json` by default, _everywhere._
- Highly modular, very easy to pull bits out/add new bits in to assist with rapid prototyping
- Standardised, doesn't employ weird and wonderful techniques like facades that make code completely unportable
- PSR compliant where appropriate, particularly PSR7
- Straightforward and simple to break down into microservices when the time comes to scale.

## Project rationale

I've spent most of my career working with PHP, i've also spent much of it dealing with frameworks that make code britle,
difficult to break down into standalone applications and so top heavy from vertical integration that making changes to
anything even remotely lower than surface level brings the entire show to a stop.

The kinds of applications built using top heavy frameworks are very difficult to scale, they're very difficult to
refactor and they're usually very difficult to test thanks to bizarre techniques employed in the name of... i have no 
idea.

This is an attempt to build the kind of framework i'd actually want to use.