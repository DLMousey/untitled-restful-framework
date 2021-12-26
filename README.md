# Untitled restful framework

A framework for PHP intended for building RESTful APIs and that's literally it. No heavyweight templating engine,
no bloat or cruft that can't be removed due to tight vertical integration, just a lightweight, dependency minimal
(was originally going to be dependency free but there's a fine line between being idealism and unrealism) framework
that's straightforward to use.

## How broken are things
![Unit Tests](https://github.com/dlmousey/untitled-restful-framework/actions/workflows/test.yml/badge.svg)

## Documentation

Nothing yet, barely past initial commit at the time of writing this readme, slow your roll.

## Project goals

- Heavily config driven, simple to make sweeping changes by altering configuration.
- `application/json` by default, _everywhere._
- Highly modular, very easy to pull bits out/add new bits in to assist with rapid prototyping
- Standardised, doesn't employ weird and wonderful techniques like facades that make code completely unportable
- PSR compliant where appropriate, particularly PSR7
- Straightforward and simple to break down into microservices when the time comes to scale.

## Inspiration

This project is heavily inspired by the Laminas framework (formerly known as Zend framework) but even more stripped 
down and lean, giving zero consideration to bloated templated engines and anything falling remotely beyond the purview
of a RESTful API.

## Project rationale

I've spent most of my career working with PHP, i've also spent much of it ~~working with~~ coping with frameworks that make code britle,
difficult to break down, impossible to scale and so top heavy from vertical integration that making changes to
anything even remotely lower than surface level brings the entire show to a stop.

The kinds of applications built using top heavy frameworks are often;
- **Bloated** - here, take the kitchen sink, it's not optional, _take it._ Now you can write views for your RESTful API, yay!
- **Impossible to scale** - cyclical dependencies, cyclical dependencies everywhere
- **Impossible to break down into smaller apps** - why would anyone want just the sink bit of the kitchen sink?
- **Very top heavy** - everything's vertically integrated because columns are neat and tidy, breaking things down into separate apps is for whimps

This is an attempt to build the kind of framework i'd actually want to use.