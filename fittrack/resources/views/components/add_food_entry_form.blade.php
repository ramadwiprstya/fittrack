<!-- Modal untuk form asupan makanan -->
<div id="addFoodModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; overflow-y: auto;">
    <div style="position: relative; top: 50px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; width: 400px; max-width: 90%; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
        <div class="mt-3">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modalTitle">Tambah Asupan Makanan</h3>
                <button id="closeModal" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Form -->
            <div class="px-2 py-3">
                <form id="foodEntryForm" action="{{ route('nutrition.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="meal_type" id="modalMealType">
                    <input type="hidden" name="date" id="modalDate" value="{{ now()->format('Y-m-d') }}">
                    
                    <!-- Nama Makanan -->
                    <div class="mb-4">
                        <label for="food_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Makanan:</label>
                        <input type="text" name="food_name" id="food_name" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                               placeholder="Masukkan nama makanan" required>
                    </div>
                    
                    <!-- Jumlah/Porsi -->
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Jumlah/Porsi:</label>
                        <input type="number" name="quantity" id="quantity" step="0.1" min="0.1"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                               placeholder="1" value="1" required>
                    </div>
                    
                    <!-- Unit -->
                    <div class="mb-4">
                        <label for="unit" class="block text-gray-700 text-sm font-bold mb-2">Satuan:</label>
                        <select name="unit" id="unit" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500">
                            <option value="porsi">Porsi</option>
                            <option value="gram">Gram</option>
                            <option value="kg">Kilogram</option>
                            <option value="ml">Mililiter</option>
                            <option value="liter">Liter</option>
                            <option value="buah">Buah</option>
                            <option value="potong">Potong</option>
                            <option value="sendok">Sendok</option>
                        </select>
                    </div>
                    
                    <!-- Kalori -->
                    <div class="mb-4">
                        <label for="calories" class="block text-gray-700 text-sm font-bold mb-2">Kalori (kcal):</label>
                        <input type="number" name="calories" id="calories" min="0" step="0.1"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                               placeholder="0" required>
                    </div>
                    
                    <!-- Protein -->
                    <div class="mb-4">
                        <label for="protein" class="block text-gray-700 text-sm font-bold mb-2">Protein (g):</label>
                        <input type="number" name="protein" id="protein" min="0" step="0.1"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                               placeholder="0">
                    </div>
                    
                    <!-- Karbohidrat -->
                    <div class="mb-4">
                        <label for="carbs" class="block text-gray-700 text-sm font-bold mb-2">Karbohidrat (g):</label>
                        <input type="number" name="carbs" id="carbs" min="0" step="0.1"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                               placeholder="0">
                    </div>
                    
                    <!-- Lemak -->
                    <div class="mb-4">
                        <label for="fat" class="block text-gray-700 text-sm font-bold mb-2">Lemak (g):</label>
                        <input type="number" name="fat" id="fat" min="0" step="0.1"
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-green-500" 
                               placeholder="0">
                    </div>
                    
                    <!-- Tombol -->
                    <div class="flex space-x-3">
                        <button type="submit" 
                                class="flex-1 px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition-colors">
                            <i class="fas fa-plus mr-2"></i>Tambah
                        </button>
                        <button type="button" id="cancelModal" 
                                class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 text-base font-medium rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors">
                            <i class="fas fa-times mr-2"></i>Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
