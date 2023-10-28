# Makefile
install:
	composer install

brain-games:
	./bin/brain-games

# проверка валидности composer.json
validate:
	composer validate
