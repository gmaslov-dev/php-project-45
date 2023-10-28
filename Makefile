# Makefile
install:
	composer install

brain-games:
	./bin/brain-games

# проверка валидности composer.json
validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
