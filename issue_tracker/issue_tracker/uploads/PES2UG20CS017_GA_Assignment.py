# XOR Genetic Algorithm

import random
import math
import sys

# Global variables
population = []
population_size = 100
mutation_rate = 0.01
crossover_rate = 0.7
generations = 50
target = [1, 0, 1, 0, 1, 0, 1, 0, 1, 0]
target_size = len(target)
chromosome_size = target_size
def fitness(chromosome):
		"""Fitness function"""
		fitness = 0
		for i in range(chromosome_size):
				if chromosome[i] == target[i]:
						fitness += 1
		return fitness
	
def generate_chromosome():
		"""Generate a random chromosome"""
		chromosome = []
		for i in range(chromosome_size):
				chromosome.append(random.randint(0, 1))
		return chromosome

def generate_population():
		"""Generate a random population"""
		population = []
		for i in range(population_size):
				population.append(generate_chromosome())
		return population
	
def selection(population):
		"""Select two chromosomes for crossover"""
		chromosome1 = random.choice(population)
		chromosome2 = random.choice(population)
		return chromosome1, chromosome2

def crossover(chromosome1, chromosome2):
		"""Perform crossover"""
		if random.random() < crossover_rate:
				point = random.randint(0, chromosome_size)
				temp1 = []
				temp2 = []
				temp1.extend(chromosome1[0:point])
				temp1.extend(chromosome2[point:chromosome_size])
				temp2.extend(chromosome2[0:point])
				temp2.extend(chromosome1[point:chromosome_size])
				chromosome1 = temp1
				chromosome2 = temp2
		return chromosome1, chromosome2

def mutation(chromosome):
		"""Perform mutation"""
		for i in range(chromosome_size):
				if random.random() < mutation_rate:
						chromosome[i] = 1 - chromosome[i]
		return chromosome

def run():
		"""Genetic algorithm"""
		population = generate_population()
		for i in range(generations):
				population.sort(key=fitness, reverse=True)
				print("Generation", i, ":", population[0], fitness(population[0]))
				if fitness(population[0]) == chromosome_size:
						break
				new_population = []
				new_population.extend(population[0:10])
				for j in range(90):
						chromosome1, chromosome2 = selection(population)
						chromosome1, chromosome2 = crossover(chromosome1, chromosome2)
						chromosome1 = mutation(chromosome1)
						chromosome2 = mutation(chromosome2)
						new_population.append(chromosome1)
						new_population.append(chromosome2)
				population = new_population
		return population[0]

if __name__ == "__main__":
		chromosome = run()
		# Print the Generation, Chromosome and Fitness
		print("Generation", generations, ":", chromosome, fitness(chromosome))
		# Print the final result and generation
		print("Final result:", chromosome, "in generation", generations)
